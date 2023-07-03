import { Component } from '@angular/core';
import { AllService } from '../../services/all.service';

@Component({
  selector: 'app-beneficiaries-creche',
  templateUrl: './beneficiaries.component.html'
})
export class BeneficiariesComponent {
  beneficiaries: any;
  hayError: boolean=false;
  data: any[];
  header=['Id','Beneficiario','Prioridad','Grado','Fecha','Horario'];

  constructor(private allService:AllService){}

  ngOnInit(): void {
    this.initTable();
  }

  private initTable(){
    this.allService.indexBeneficiary().subscribe({next:(beneficiaries)=>{
        this.beneficiaries=beneficiaries;
        this.data = this.beneficiaries.data;
      },error:()=>{
        this.hayError=true;
      }
    });
  }
}
