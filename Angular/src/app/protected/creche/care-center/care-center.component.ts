import { Component } from '@angular/core';
import { CrecheService } from '../../services/creche.service';

@Component({
  selector: 'app-care-center',
  templateUrl: './care-center.component.html'
})
export class CareCenterComponent {
  creches: any;
  hayError: boolean=false;
  data: any[];
  headers=['Id','Grado','Sala','Capacidad','En','En Proceso','Rechazado(s)','Libre(s)'];

  constructor(private crecheService:CrecheService){}

  ngOnInit(): void {
    this.initTable();
  }

  private initTable(){
    this.crecheService.indexCreche().subscribe({next:(creches)=>{
        this.creches=creches;
        this.data = this.creches.data;
      },error:()=>{
        this.hayError=true;
      }
    });
  }
}
