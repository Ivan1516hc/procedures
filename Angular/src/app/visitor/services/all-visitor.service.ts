import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class AllVisitorService {
  private baseUrl: string = environment.baseUrl;

  constructor(private http: HttpClient) { }

  indexRequestVisitor(): Observable<any> {
    const url = `${this.baseUrl}/visitor/request`;
    return this.http.get<any>(url);
  }
}
