import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable, of } from 'rxjs';
import { map, switchMap } from 'rxjs/operators';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class CrecheService {
  private baseUrl: string = environment.baseUrl;
  private baseUrlDataC: string = 'http://datac.difzapopan.gob.mx/api-servicios/public/api';

  constructor(private http: HttpClient) { }

  getCatalogs(): Observable<any> {
    const url = this.baseUrlDataC+'/data/catalogos';
    return this.http.get<any>(url);
  }

  getLocations():Observable<any>{
    const url = this.baseUrl+'/location/creches';
    return this.http.get<any>(url);
  }
  
  //obtener las salas de un centro y grado especifico
  requestCreche(data:any): Observable<any> {
    const url = `${this.baseUrl}/creche/request/`+ data.center_id +`/`+data.degree_id;
    return this.http.get<any>(url);
  }

  getPostalCodeInfo(value:number){
    const url = this.baseUrlDataC+'/data/colonias/' + value;
    return this.http.get<any>(url);
  }

  fetchCurp(curp: any, fetchColonias = false): Observable<any> {
    const value = curp;
    let Age = 0;

    return this.http.get<any>(this.baseUrlDataC+'/1111112022/get/curp/' + value)
      .pipe(
        switchMap(response => {
          if (Array.isArray(response) && response.length > 0 && response[0] === 'ok') {
            if (fetchColonias) {
              return this.fetchColonias(response[1].codigopostal).pipe(
                map(coloniasResponse => ({
                  ...response[1],
                  edad: this.calculate_age(response[1].fechanacimiento),
                  coloniasResponse
                }))
              );
            } else {
              return of({
                ...response[1],
                edad: this.calculate_age(response[1].fechanacimiento)
              });
            }
          } else {
            return this.http.get<any>(this.baseUrlDataC+'/1111112022/validarCurp/' + value)
              .pipe(
                map(newResponse => {
                  if (newResponse[1] !== 'NO EXITOSO') {
                    let date = newResponse[5].split('/').reverse().join('-');
                    Age = this.calculate_age(date);
                    return {
                      apaterno: newResponse[2],
                      amaterno: newResponse[3],
                      curp: newResponse[0],
                      nombre: newResponse[1],
                      fechanacimiento: date,
                      edad: Age,
                      sexo:newResponse[4] == "H" ? 1 : 2,
                    };
                  } else {
                    throw new Error('No se encontró una respuesta EXITOSA');
                  }
                })
              );
          }
        })
      );
  }

  fetchColonias(value: any): Observable<any> {
    const url = this.baseUrlDataC+'/data/colonias/' + value;
    return this.http.get<any>(url);
  }

  calculate_age(e: any): number {
    const birthDate = new Date(e);
    const difference = Date.now() - birthDate.getTime();
    const age = new Date(difference);
    const ageMom = Math.abs(age.getUTCFullYear() - 1970);

    return ageMom;
  }

  createRequest(data:any){
    const url =`${this.baseUrl}/creche/request/create`;
    const body=JSON.stringify(data);
     return this.http.post<any>(url,body)
  }
}
