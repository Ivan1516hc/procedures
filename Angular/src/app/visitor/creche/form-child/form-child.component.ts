import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-form-child',
  templateUrl: './form-child.component.html',
  styleUrls: ['./form-child.component.css']
})
export class FormChildComponent {

  constructor(private fb: FormBuilder) { }

  miFormulario: FormGroup = this.fb.group({
    creche_id: [[Validators.nullValidator]],
  });

  onSubmit(){
    
  }
}
