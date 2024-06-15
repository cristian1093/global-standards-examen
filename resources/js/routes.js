const Home = () => import('./components/Home.vue')


const mostrarMovies = () => import('./components/movie/Mostrar.vue')
const crearMovie = () => import('./components/movie/Crear.vue')
const EditarMovie = () => import('./components/movie/Editar.vue');

const mostrarSchedule = () => import('./components/schedule/Mostrar.vue')
const crearSchedule = () => import('./components/schedule/Crear.vue')
const EditarSchedule = () => import('./components/schedule/Editar.vue')

const MostrarSchedule = () => import('./components/movie/MostrarSchedule.vue');

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'mostrarMovies',
        path: '/movies',
        component: mostrarMovies
    },
    {
        name: 'crearMovie',
        path: '/movies/crear',
        component: crearMovie
    },
    {
        name: 'editarMovie',
        path: '/movies/editar/:id',
        component: EditarMovie
    },
    {
        name: 'mostrarSchedule',
        path: '/schedules',
        component: mostrarSchedule
    },
    {
        name: 'crearSchedule',
        path: '/schedules/crear/:id',
        component: crearSchedule
    },
    {
        name: 'editarSchedule',
        path: '/schedules/editar/:id',
        component: EditarSchedule
    },
    {
        name: 'editarMovieSchedule',
        path: '/movies/schedule/:id',
        component: MostrarSchedule
    },
]
