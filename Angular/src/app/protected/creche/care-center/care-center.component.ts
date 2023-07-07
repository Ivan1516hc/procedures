import { Component, ElementRef } from '@angular/core';
import { CrecheService } from '../../services/creche.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-care-center',
  templateUrl: './care-center.component.html'
})
export class CareCenterComponent {
  creches: any;
  hayError: boolean = false;
  data: any[];
  headers = ['Id', 'Grado', 'Sala', 'Capacidad', 'Activos', 'En Proceso', 'Rechazado(s)', 'Libre(s)'];
  beneficiaries: any = false;
  beneficiary: any = false;

  constructor(private elementRef: ElementRef,private fb: FormBuilder, private crecheService: CrecheService) { }

  miFormulario: FormGroup = this.fb.group({
    creche_id: [[Validators.nullValidator]],
  });


  ngOnInit(): void {
    this.initTable();
  }

  private initTable() {
    this.crecheService.indexCreche().subscribe({
      next: (creches) => {
        this.creches = creches;
        this.data = this.creches.data;
      }, error: () => {
        this.hayError = true;
      }
    });
  }

  setBeneficiary(data: any) {
    this.miFormulario.patchValue({
      creche_id: data.beneficiary_creche[0].creche_id
    });
    this.beneficiary = data;
  }

  changeStatusBeneficiary(status: number, pivote_id: number) {
    const body = {}
    body['pivote_id'] = pivote_id;
    body['status'] = status;
    this.crecheService.updateBeneficiaryCreche(body).subscribe(response => {
      if (response.code == 200) {
        this.initTable();
        this.cerrarModal();
      } else {

      }
    })
  }

  getBeneficiaries(creche_id: number) {
    this.crecheService.showBeneficiaryCreche(creche_id).subscribe({
      next: (beneficiary) => {
        this.beneficiaries = beneficiary;
      }, error: () => {
        this.hayError = true;
      }
    });
  }

  changeCreche() {
    const form = this.miFormulario.value;
    const [id, capacity] = form.creche_id.split(',');
    if (form == 0) {
      return;
    }
    const data = {}
    data['pivote_id'] = this.beneficiary.beneficiary_creche[0].id;
    data['creche_id'] = id;
    data['quota'] = capacity;
    data['beneficiary_id'] = this.beneficiary.id;
    this.crecheService.updateBeneficiaryCreche(data).subscribe(response => {
      if (response.code == 200) {
        this.initTable();
        this.cerrarModal();
      } else {

      }
    })
  }

  cerrarModal() {
    const botonCancel: any = this.elementRef.nativeElement.querySelector('#cancel');
    botonCancel.click();
  }
}
