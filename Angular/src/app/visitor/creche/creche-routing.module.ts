import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { FormChildComponent } from './form-child/form-child.component';

const routes: Routes = [{
  path: '',
  children:[
    {path: 'beneficiario', component:FormChildComponent},
    //------------------------------------------------------------------------------------------------------
    {path: '**', redirectTo: 'home'},
  ]
}];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class CrecheRoutingModule { }
