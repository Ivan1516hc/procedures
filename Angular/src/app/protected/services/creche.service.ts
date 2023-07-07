import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class CrecheService {
  private baseUrl: string = environment.baseUrl;

  constructor(private http: HttpClient) { }

  indexCreche(): Observable<any> {
    const url = `${this.baseUrl}/creche`;
    return this.http.get<any>(url);
  }

  requestCreche(data:any): Observable<any> {
    const url = `${this.baseUrl}/creche/request/`+ data.center_id +`/`+data.degree_id;
    return this.http.get<any>(url);
  }

  createBeneficiaryCreche(data:any){
    const url =`${this.baseUrl}/creche/beneficiary/create`;
    const body=JSON.stringify(data);
     return this.http.post<any>(url,body)
  }

  updateBeneficiaryCreche(data:any){
    const url =`${this.baseUrl}/creche/beneficiary/update`;
    return this.http.put<any>(url,data);
  }

  showBeneficiaryCreche(creche_id:number){
    const url =`${this.baseUrl}/creche/beneficiaries/`+creche_id;
     return this.http.get<any>(url)
  }
}
