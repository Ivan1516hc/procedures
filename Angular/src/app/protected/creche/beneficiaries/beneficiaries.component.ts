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
  header=['Id','Beneficiario','Fecha Nacimiento','Estado','Grado','Sala'];

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
