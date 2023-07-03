import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { DashboardComponent } from './dashboard/dashboard.component';
import { RequestsComponent } from './requests/requests.component';
import { QuotesComponent } from './quotes/quotes.component';
import { BeneficiariesComponent } from './beneficiaries/beneficiaries.component';
import { CareCenterComponent } from './care-center/care-center.component';

const routes: Routes = [{
  path: '',
  children:[
    {path: 'dashboard', component:DashboardComponent},
    {path: 'solicitudes', component:RequestsComponent},
    {path: 'citas', component:QuotesComponent},
    {path: 'beneficiarios', component:BeneficiariesComponent},
    {path: 'salas', component:CareCenterComponent},
    //------------------------------------------------------------------------------------------------------
    {path: '**', redirectTo: 'dashboard'},
  ]
}];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class CrecheRoutingModule { }
