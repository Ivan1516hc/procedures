import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-quotes',
  templateUrl: './quotes.component.html'
})
export class QuotesComponent {
  @Input() headers:any= [];
  @Input() data:any= [];
  
  constructor() {
    this.headers=[];
    this.data=[];
  }
}
