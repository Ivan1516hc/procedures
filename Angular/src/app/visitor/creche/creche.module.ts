import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { CrecheRoutingModule } from './creche-routing.module';
import { FormChildComponent } from './form-child/form-child.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { FormParentsComponent } from './form-parents/form-parents.component';


@NgModule({
  declarations: [
    FormChildComponent,
    FormParentsComponent
  ],
  imports: [
    CommonModule,
    CrecheRoutingModule,
    ReactiveFormsModule,
    FormsModule
  ]
})
export class CrecheModule { }
