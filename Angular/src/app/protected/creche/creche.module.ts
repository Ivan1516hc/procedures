import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { CrecheRoutingModule } from './creche-routing.module';
import { SharedModule } from '../shared/shared.module';
import { DashboardComponent } from './dashboard/dashboard.component';
import { CrecheComponent } from './creche.component';
import { RequestsComponent } from './requests/requests.component';
import { QuotesComponent } from './quotes/quotes.component';
import { BeneficiariesComponent } from './beneficiaries/beneficiaries.component';
import { CareCenterComponent } from './care-center/care-center.component';
import { ReactiveFormsModule } from '@angular/forms';


@NgModule({
  declarations: [
    DashboardComponent,
    CrecheComponent,
    RequestsComponent,
    QuotesComponent,
    BeneficiariesComponent,
    CareCenterComponent
  ],
  imports: [
    CommonModule,
    CrecheRoutingModule,
    SharedModule,
    ReactiveFormsModule,
  ]
})
export class CrecheModule { }
