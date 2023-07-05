import { Component, EventEmitter, Input, OnInit, Output, ElementRef } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { AllService } from 'src/app/protected/services/all.service';

@Component({
  selector: 'app-requests',
  templateUrl: './requests.component.html'
})
export class RequestsComponent implements OnInit {
  @Input() headers: any = [];
  @Input() data: any = [];
  id: any = null;

  // Agrega una propiedad de salida para notificar al componente padre cuando se crea una cita
  @Output() citaCreada: EventEmitter<any> = new EventEmitter<any>();

  constructor(private fb: FormBuilder, private allService: AllService, private elementRef: ElementRef) {
    this.headers = [];
    this.data = [];
  }

  miFormulario: FormGroup = this.fb.group({
    request_id: [this.id, [Validators.required]],
    attended: [2, [Validators.nullValidator]],
    date: ['', [Validators.required]],
    hour: ['', [Validators.required]]
  });

  ngOnInit(): void {

  }

  changeStatus(data: any) {
    this.allService.updateRequest(data).subscribe(response => {
      if (response.code == 200) {
        this.citaCreada.emit();
      } else {
        // Swal.fire("Error", "error")
      }
    })
  }

  schedule() {
    if (this.miFormulario.invalid) {
      return this.miFormulario.markAllAsTouched();
    }
    const data = this.miFormulario.value;
    this.allService.createQuote(data).subscribe(response => {
      if (response.code == 200) {
        this.citaCreada.emit();
        this.cerrarModal();
      } else {
        // Swal.fire("Error", "error")
      }
    })
  }

  getRequest(item: any) {
    this.miFormulario.patchValue({
      request_id: item.id
    });
    this.id = item;
  }

  cerrarModal() {
    const botonCancel: any = this.elementRef.nativeElement.querySelector('#cancel');
    botonCancel.click();
  }
}
