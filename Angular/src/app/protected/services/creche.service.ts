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
}
