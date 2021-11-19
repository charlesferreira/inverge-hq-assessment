import Alpine from 'alpinejs'
import {sidebar} from "./alpine/sidebar"
import {appState} from "./alpine/app-state"
import {errors} from "./alpine/errors";

require('./bootstrap')

Alpine.store('isLoading', true)
Alpine.store('sidebar', sidebar)
Alpine.store('errors', errors)
Alpine.data('appState', appState)

window.Alpine = Alpine
Alpine.start()

