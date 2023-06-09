import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { CrecheRoutingModule } from './creche-routing.module';
import { SharedModule } from '../shared/shared.module';
import { DashboardComponent } from './dashboard/dashboard.component';
import { CrecheComponent } from './creche.component';


@NgModule({
  declarations: [
    DashboardComponent,
    CrecheComponent
  ],
  imports: [
    CommonModule,
    CrecheRoutingModule,
    SharedModule
  ]
})
export class CrecheModule { }
