import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-beneficiaries',
  templateUrl: './beneficiaries.component.html'
})
export class BeneficiariesComponent {
  @Input() headers:any= [];
  @Input() data:any= [];
  
  constructor() {
    this.headers=[];
    this.data=[];
  }
}
