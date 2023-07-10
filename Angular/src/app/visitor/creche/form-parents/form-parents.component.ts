import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { CrecheService } from '../../services/creche.service';

@Component({
  selector: 'app-form-parents',
  templateUrl: './form-parents.component.html',
  styleUrls: ['./form-parents.component.css']
})
export class FormParentsComponent {
  constructor(private fb: FormBuilder, private crecheService: CrecheService) { }

  miFormulario: FormGroup = this.fb.group({
    curp: [[Validators.required]],
    nombre: [[Validators.required]],
    apaterno: [[Validators.required]],
    amaterno: [[Validators.required]],
    fechanacimiento: [[Validators.required]],
    edad: [[Validators.required]],
    escolaridad: [[Validators.required]],
    calle: [[Validators.required]],
    numext: [[Validators.required]],
    numint: [[Validators.required]],
    primercruce: [[Validators.required]],
    segundocruce: [[Validators.required]],
    codigopostal: [[Validators.required]],
    municipio: [[Validators.required]],
    colonia: [[Validators.required]],
    vivienda: [[Validators.required]],
    sexo: [[Validators.required]],
    tipo_sangre: [[Validators.required]],
    lenguamaterna: [[Validators.required]],
    serviciosmedicos: [[Validators.required]],
    celular: [[Validators.required]],
  });

  ngOnInit(): void {
    this.initTable();
  }
  hayError: boolean = false;
  diseases: any= null;
  medicalServices: any = null;
  scholarship: any = null;
  language: any = null;
  dwelling: any = null;


  private initTable() {
    this.crecheService.getCatalogs().subscribe({
      next: (catalogs) => {
        this.diseases = catalogs.enfermedad;
        this.medicalServices = catalogs.serviciosmedicos;
        this.scholarship = catalogs.escolaridad;
        this.language = catalogs.idioma;
        this.dwelling = catalogs.vivienda;
      }, error: () => {
        this.hayError = true;
      }
    });
  }

  onSubmit() {

  }
}
