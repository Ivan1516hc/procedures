import { Component } from '@angular/core';

@Component({
  selector: 'app-creche',
  templateUrl: './creche.component.html'
})
export class CrecheComponent {
  opciones = [
    { icon: 'bi bi-file-earmark-zip', title: 'Solicitudes', route: '/api/guarderia/solicitudes' },
    { icon: 'bi bi-calendar-range', title: 'Citas', route: '/api/guarderia/citas' },
    {icon:'bi bi-person-fill', title: 'Beneficiarios', route: '/api/guarderia/beneficiarios' },
    { icon: 'bi bi-house', title: 'Guarderias', route: '/api/guarderia/' }
  ];
  urlLogo='/api/guarderia/dashboard';
}
