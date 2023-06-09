import { Component, ElementRef } from '@angular/core';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html'
})
export class DashboardComponent {
  opciones = [
    {icon:'bi bi-circle', title: 'Opción 1', route: '/opcion1' },
    { icon: 'bi bi-circle', title: 'Opción 2', route: '/opcion2' },
    // Otras opciones específicas para el trámite 1
  ];

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
