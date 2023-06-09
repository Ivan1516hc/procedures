import { Component } from '@angular/core';

@Component({
  selector: 'app-creche',
  templateUrl: './creche.component.html'
})
export class CrecheComponent {
  opciones = [
    {icon:'bi bi-circle', title: 'Opción 1', route: '/opcion1' },
    { icon: 'bi bi-circle', title: 'Opción 2', route: '/opcion2' },
    // Otras opciones específicas para el trámite 1
  ];
}
