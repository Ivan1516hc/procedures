import { Injectable } from '@angular/core';
import { environment } from '../../../environments/environment';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Requests } from '../interfaces/requests-interface';

@Injectable({
  providedIn: 'root'
})
export class AllService {
  private baseUrl: string = environment.baseUrl;

  constructor(private http: HttpClient) { }

  indexRequest(): Observable<Requests> {
    const url = `${this.baseUrl}/request`;
    return this.http.get<Requests>(url);
  }

  createRequest(data:any){
    const url =`${this.baseUrl}/request/create`;
    const body=JSON.stringify(data);
     return this.http.post<any>(url,body)
  }

  updateRequest(data:any){
    const url=`${this.baseUrl}/request/update`
    return this.http.put<any>(url,data);
  }

  indexQuote(): Observable<any> {
    const url = `${this.baseUrl}/quote`;
    return this.http.get<any>(url);
  }

  updateQuote(data:any){
    const url=`${this.baseUrl}/quote/update`
    return this.http.put<any>(url,data);
  }

  createQuote(data:any){
    const url =`${this.baseUrl}/quote/create`;
    const body=JSON.stringify(data);
     return this.http.post<any>(url,body)
  }

  indexBeneficiary(): Observable<any> {
    const url = `${this.baseUrl}/beneficiary`;
    return this.http.get<any>(url);
  }

}
