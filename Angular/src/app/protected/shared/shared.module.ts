import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { SidebarComponent } from './layouts/sidebar/sidebar.component';
import { HeaderComponent } from './layouts/header/header.component';
import { RouterModule } from '@angular/router';
import { FooterComponent } from './layouts/footer/footer.component';
import { RequestsComponent } from './layouts/requests/requests.component';
import { QuotesComponent } from './layouts/quotes/quotes.component';
import { BeneficiariesComponent } from './layouts/beneficiaries/beneficiaries.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

@NgModule({
  declarations: [
    SidebarComponent,
    HeaderComponent,
    FooterComponent,
    RequestsComponent,
    QuotesComponent,
    BeneficiariesComponent
  ],
  imports: [
    CommonModule,
    RouterModule,
    ReactiveFormsModule, 
    FormsModule,
  ],
  exports: [SidebarComponent, HeaderComponent, FooterComponent, RequestsComponent, QuotesComponent, BeneficiariesComponent]
})
export class SharedModule { }
