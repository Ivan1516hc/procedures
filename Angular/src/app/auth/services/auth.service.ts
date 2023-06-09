import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { of, Observable } from 'rxjs';
import { catchError, map, tap } from 'rxjs/operators';
import { environment } from 'src/environments/environment';


import { AuthResponse, Usuario, Validate } from '../interfaces/auth-interface';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  private baseUrl: string=environment.baseUrl;
  private _usuario!:Usuario;

  get usuario(){
    return {...this._usuario}
  }

  constructor(private http:HttpClient) { }

  login(email:string, password:string){

    const url =`${this.baseUrl}/login`
    const body={email, password}

    return this.http.post<AuthResponse>(url,body).pipe(
      tap(response =>{
        if (response.token){
          localStorage.setItem('token',response.token!);
          localStorage.setItem('code',response.query!);
          localStorage.setItem('status',response.id!)
          this._usuario={
            name:response.name!
          }
        }
      }),
      map(response => response),
      catchError(err=>of(err)),
    )
  }

  validarTokenUser():Observable<boolean>{
    const url=`${this.baseUrl}/validate`;
    const headers=new HttpHeaders().set('Authorization','Bearer '+localStorage.getItem('token')||'');
    return this.http.get<Validate>(url,{headers}).pipe(
      map(response=>{
        if(response.type == 1){
          return response.ok;
        }
        return false;
      }),
      catchError(err=>of(false))
    )
  }

  validarTokenAdmin():Observable<boolean>{
    const url=`${this.baseUrl}/validate`;
    const headers=new HttpHeaders().set('Authorization','Bearer '+localStorage.getItem('token')||'');
    return this.http.get<Validate>(url,{headers}).pipe(
      map(response=>{
        if(response.type == 2){
          return response.ok;
        }
        return false;
      }),
      catchError(err=>of(false))
    )
  }
}
