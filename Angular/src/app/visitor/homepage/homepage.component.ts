import { Component } from '@angular/core';
import { CrecheService } from '../services/creche.service';

@Component({
  selector: 'app-homepage',
  templateUrl: './homepage.component.html',
  styleUrls: ['./homepage.component.css']
})
export class HomepageComponent {

  constructor(private crecheService: CrecheService) { }
  locations:any=null;

  services = [
    {
      title: 'Servicio 1',
      description: 'Descripción del servicio 1',
      image: 'https://ejemplo.com/imagen1.jpg'
    },
    {
      title: 'Servicio 2',
      description: 'Descripción del servicio 2',
      image: 'https://ejemplo.com/imagen2.jpg'
    },
    {
      title: 'Servicio 3',
      description: 'Descripción del servicio 3',
      image: 'https://ejemplo.com/imagen3.jpg'
    }
  ];

  getLocations(){
    this.crecheService.getLocations().subscribe({next:(response){
      console.log(response);
    }})
  }

  getCreches(){
    
  }
}
