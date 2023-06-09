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
  header=['Id','Beneficiario','Edad','Tutor','Prioridad','Grado','Fecha','Estado'];

  constructor(private allService:AllService){}

  ngOnInit(): void {
    this.initTable();
  }

  recargarDatosTabla() {
    this.initTable();
  }

  private initTable(){
    this.allService.indexRequest().subscribe({next:(request)=>{
        this.request=request;
        this.data = this.request.data;
      },error:()=>{
        this.hayError=true;
      }
    });
  }
}
