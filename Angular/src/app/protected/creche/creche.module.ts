import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { CrecheRoutingModule } from './creche-routing.module';
import { SharedModule } from '../shared/shared.module';
import { DashboardComponent } from './dashboard/dashboard.component';
import { CrecheComponent } from './creche.component';
import { RequestsComponent } from './requests/requests.component';
import { QuotesComponent } from './quotes/quotes.component';
import { BeneficiariesComponent } from './beneficiaries/beneficiaries.component';


@NgModule({
  declarations: [
    DashboardComponent,
    CrecheComponent,
    RequestsComponent,
    QuotesComponent,
    BeneficiariesComponent
  ],
  imports: [
    CommonModule,
    CrecheRoutingModule,
    SharedModule
  ]
})
export class CrecheModule { }
