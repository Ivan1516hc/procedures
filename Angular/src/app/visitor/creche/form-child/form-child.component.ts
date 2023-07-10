import { Component } from '@angular/core';
import { FormArray, FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { CrecheService } from '../../services/creche.service';

@Component({
  selector: 'app-form-child',
  templateUrl: './form-child.component.html',
  styleUrls: ['./form-child.component.css']
})
export class FormChildComponent {

  constructor(private fb: FormBuilder,private crecheService: CrecheService) { }

  miFormulario: FormGroup = this.fb.group({
    curp: [[Validators.required]],
    nombre: [[Validators.required]],
    apaterno: [[Validators.required]],
    amaterno: [[Validators.required]],
    fechanacimiento: [[Validators.required]],
    edad: [[Validators.required]],
    tipo_sangre: [[Validators.required]],
    hermanos_en_CDI: new FormArray([
      new FormGroup({
        curp: new FormControl(''),
      })
    ])
  });

  get hermanos_en_CDI(): FormArray {
    return this.miFormulario.get('hermanos_en_CDI') as FormArray;
  }

  searchPerson(){
    this.crecheService.fetchCurp('HECB000817HMNRSNA5').subscribe({next:(response)=>{
      console.log(response);
    }, error:(error)=>{
      console.log(error);
      this.hayError = true;
    }})
  }

  addHermano() {
    this.hermanos_en_CDI.push(
      new FormGroup({
        curp: new FormControl(''),
      })
    )
  }

  deleteHermano(){

  }

  ngOnInit(): void {
    this.initTable();
    this.searchPerson();
  }
  hayError: boolean = false;
  diseases: any= null;

  private initTable() {
    this.crecheService.getCatalogs().subscribe({
      next: (catalogs) => {
        this.diseases = catalogs.enfermedad;
      }, error: () => {
        this.hayError = true;
      }
    });
  }

  onSubmit() {

  }
}
