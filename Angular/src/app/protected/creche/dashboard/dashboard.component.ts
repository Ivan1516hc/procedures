import { Component, ElementRef } from '@angular/core';

@Component({
  selector: 'app-dashboard-creche',
  templateUrl: './dashboard.component.html'
})
export class DashboardComponent {

  constructor(
    private elementRef: ElementRef
    ) { }

  ngOnInit(): void {
    var s = document.createElement("script");
    s.type = "text/javascript";
    s.src = "../assets/js/main.js";
    this.elementRef.nativeElement.appendChild(s);
  }


}
