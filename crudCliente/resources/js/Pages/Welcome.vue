<template>
    <div>
         <button  class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCreate">Crear cliente</button>
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Contacto empresa</th>
                <th>Nombre completo</th>
                <th>Dirección</th>
                <th>Cp</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>

            <tr v-for="cliente  in clientes.data" :key="cliente.id">
                <td>{{cliente.id}}</td>
                <td>{{cliente.contacto_empresa}}</td>
                <td>{{cliente.apellido_paterno}} {{cliente.apellido_materno}} {{cliente.nombre}}</td>
                <td>{{cliente.direccion}}</td>
                <td>{{cliente.cp}}</td>
                <td>{{cliente.tel}}</td>
                <td>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEdit">Editar</button>
                <button class="btn btn-danger" @click="eliminar(cliente)">Eliminar</button>
                </td>
            </tr>
        </table>
    </div>
</template>

<script setup lang="ts">
import Swal from 'sweetalert2';
import {defineProps} from 'vue';
import { useForm } from "@inertiajs/vue3";

const form=useForm({});

const props=defineProps({
clientes:{type:Object,}
});

const eliminar = (cliente) => {
    console.log(cliente);
    const swalWithBootstrapButtons = Swal.mixin({
        buttonsStyling: true
    });
    swalWithBootstrapButtons.fire({
        title: 'Seguro que desea eliminar el cliente',
        text: 'Se perderá el cliente',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            form.delete(route('cliente.destroy'), cliente);
        }
    });
};

/*
import Modal from './Modal.vue';

const props=defineProps({
     clientes: {
      type: Object,
      required: true
    },

})

const form = useForm({
    id: 0,
    contacto_empresa: '',
    nombre: '',
    apellido_paterno: '',
    apellido_materno: '',
    direccion: '',
    tel: '',
    cp: '',
});*/

</script>

<style scoped></style>
