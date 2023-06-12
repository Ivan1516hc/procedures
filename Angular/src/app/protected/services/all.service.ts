import { Injectable } from '@angular/core';
import { environment } from '../../../environments/environment';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AllService {
  private baseUrl: string=environment.baseUrl;

  constructor(private http:HttpClient) { }

  index():Observable<any[]>{
    const url= `${this.baseUrl}/admin/get-solicitudes`;
    return this.http.get<any[]>(url);
  }

  delete($id:number):Observable<any>{
    const url= `${this.baseUrl}/economic-activity/delete/${$id}`;
    return this.http.get<any>(url);
  }
}