import { Component } from '@angular/core';
import { AllService } from '../../services/all.service';

@Component({
  selector: 'app-quotes-creche',
  templateUrl: './quotes.component.html'
})
export class QuotesComponent {
  quotes: any;
  hayError: boolean=false;
  data: any[];
  header=['Id','Beneficiario','Prioridad','Grado','Fecha','Horario'];

  constructor(private allService:AllService){}

  ngOnInit(): void {
    this.initTable();
  }

  private initTable(){
    this.allService.indexQuote().subscribe({next:(quotes)=>{
        this.quotes=quotes;
        this.data = this.quotes.data;
      },error:()=>{
        this.hayError=true;
      }
    });
  }
}
