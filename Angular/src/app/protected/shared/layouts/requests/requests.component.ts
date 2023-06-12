import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-requests',
  templateUrl: './requests.component.html'
})
export class RequestsComponent {
  @Input() headers:any= [];
  @Input() data:any= [];
  
  constructor() {
    this.headers=[];
    this.data=[];
  }
}
