import { Component } from '@angular/core';
import { CrecheService } from '../services/creche.service';

@Component({
  selector: 'app-homepage',
  templateUrl: './homepage.component.html',
  styleUrls: ['./homepage.component.css']
})
export class HomepageComponent {

  constructor(private crecheService: CrecheService) { }
  locations: any = null;
  selectLocation: any = "";
  selectCreche: any = "";
  creches: any = [];

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

  getLocations(id: number) {
    this.crecheService.getLocations(id).subscribe({
      next: (response) => {
        this.locations = response;
      }
    })
  }

  createRequest() {
    if (this.selectCreche != "" && this.selectLocation != "") {
      const data=[];
      data['procedure_id'] = localStorage.getItem('procedure');
      data['center_id'] = this.selectLocation;
      data['degree_id']= this.selectCreche;
      this.crecheService.createRequest(data).subscribe({
        next: (response)=>{

        }
      })
    }
  }

  setProcedure(id:any){
    localStorage.removeItem('procedure');
    localStorage.setItem('procedure',id);
  }

  getCreches() {
    this.crecheService.getCreches(this.selectLocation).subscribe({
      next: (response) => {
        this.creches = response;
      }
    })
  }
}
