import { Component, ElementRef, EventEmitter, Input, Output } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { AllService } from 'src/app/protected/services/all.service';
import { CrecheService } from 'src/app/protected/services/creche.service';

@Component({
  selector: 'app-quotes',
  templateUrl: './quotes.component.html'
})
export class QuotesComponent {
  @Input() headers: any = [];
  @Input() data: any = [];
  @Output() asistenciaCreada: EventEmitter<any> = new EventEmitter<any>();
  id: any = null;
  creches: any = null;
  beneficiary: any = null;
  quote_id: any = null;
  request_id: any = null;
  pivote_id: any = null;

  miFormulario: FormGroup = this.fb.group({
    creche_id: ['0', [Validators.nullValidator]],
  });

  constructor(private elementRef: ElementRef, private fb: FormBuilder, private allService: AllService, private crecheService: CrecheService) {
    this.headers = [];
    this.data = [];
  }

  changeStatus(data: any) {
    this.allService.updateQuote(data).subscribe(response => {
      if (response.code == 200) {
        this.asistenciaCreada.emit();
      } else {
        // Swal.fire("Error", "error")
      }
    })
  }

  getCreches(data: any) {
    this.quote_id = data.id;
    this.request_id = data.request_id;
    this.pivote_id = data.pivote_id;
    this.crecheService.requestCreche(data).subscribe(response => {
      if (response) {
        this.creches = response;
      } else {
        // Swal.fire("Error", "error")
      }
    })
    this.beneficiary = data.beneficiary;
  }

  assignCreche() {
    const form = this.miFormulario.value;
    const [id, capacity] = form.creche_id.split(',');
    if(form == 0){
      return;
    }
    const data = {}
    data['creche_id'] = id;
    data['quota'] = capacity;
    data['beneficiary_id'] = this.beneficiary.id;
    data['quote_id'] = this.quote_id;
    data['request_id'] = this.request_id;
    data['pivote_id'] = this.pivote_id;
    console.log(data);
    this.crecheService.createBeneficiaryCreche(data).subscribe(response => {
      if (response.code == 200) {
        this.asistenciaCreada.emit();
        console.log(response);
      }else{

      }
    })
  }

  cerrarModal() {
    const botonCancel: any = this.elementRef.nativeElement.querySelector('#cancel');
    botonCancel.click();
  }
}
