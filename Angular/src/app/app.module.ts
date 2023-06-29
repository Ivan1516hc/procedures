import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HTTP_INTERCEPTORS, HttpClientModule } from '@angular/common/http';
import { HeadersInterceptorService } from './interceptors/headers-interceptor.service';
import { ErrorInterceptorService } from './interceptors/error-interceptor.service';

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule
  ],
  providers: [
    [{provide: HTTP_INTERCEPTORS, useClass:HeadersInterceptorService, multi:true},
    {provide: HTTP_INTERCEPTORS,useClass: ErrorInterceptorService,multi: true},]],
  bootstrap: [AppComponent]
})
export class AppModule { }
