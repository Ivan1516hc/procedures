import { Component } from '@angular/core';
import { AllService } from '../../services/all.service';

@Component({
  selector: 'app-requests-creche',
  templateUrl: './requests.component.html'
})
export class RequestsComponent {

  request: any=[];
  hayError: boolean=false;
  data = [];
  header=['Id','Solicitante','Beneficiario','Fecha'];

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
        this.request=[];
      }
    });
  }
}
