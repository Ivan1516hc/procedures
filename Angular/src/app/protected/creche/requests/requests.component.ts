import { Component } from '@angular/core';
import { AllService } from '../../services/all.service';
import { Requests, RequestsResponse } from '../../interfaces/requests-interface';

@Component({
  selector: 'app-requests-creche',
  templateUrl: './requests.component.html'
})
export class RequestsComponent {

  request: Requests;
  hayError: boolean=false;
  data: RequestsResponse[];
  header=['Id','Beneficiario','Edad','Tutor','Prioridad','Grado','Fecha'];

  constructor(private allService:AllService){}

  ngOnInit(): void {
    this.initTable();
  }

  private initTable(){
    this.allService.index().subscribe({next:(request)=>{
        this.request=request;
        this.data = this.request.data;
      },error:()=>{
        this.hayError=true;
      }
    });
  }
}
