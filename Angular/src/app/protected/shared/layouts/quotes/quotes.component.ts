import { Component, ElementRef, EventEmitter, Input, Output } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { AllService } from 'src/app/protected/services/all.service';

@Component({
  selector: 'app-quotes',
  templateUrl: './quotes.component.html'
})
export class QuotesComponent {
  @Input() headers:any= [];
  @Input() data:any= [];
  @Output() asistenciaCreada: EventEmitter<any> = new EventEmitter<any>();
  id: any = null;
  creches: any = null;

  // miFormulario: FormGroup = this.fb.group({
  //   creche_id: [this.id, [Validators.required]],
  //   beneficiary_id: [this.id, [Validators.required]],
  //   status: [1, [Validators.nullValidator]],
  // });

  constructor(private elementRef: ElementRef, private fb: FormBuilder,private allService: AllService) {
    this.headers=[];
    this.data=[];
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

  getCreches(center:any,pivote:any){

  }

  // getRequest(item: any) {
  //   this.miFormulario.patchValue({
  //     request_id: item.id
  //   });
  //   this.id = item;
  // }

  cerrarModal() {
    const botonCancel: any = this.elementRef.nativeElement.querySelector('#cancel');
    botonCancel.click();
  }
}
