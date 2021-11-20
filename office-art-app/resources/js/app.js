import Alpine from 'alpinejs';

import { departments } from './alpine/departments';
import { errors } from './alpine/errors';
import { objects } from './alpine/objects';
import { sidebar } from './alpine/sidebar';
import { timer } from './alpine/timer';

require('./bootstrap')

Alpine.store('isLoading', true)
Alpine.store('sidebar', sidebar)
Alpine.store('errors', errors)
Alpine.store('timer', timer)
Alpine.store('departments', departments)
Alpine.store('objects', objects)

window.Alpine = Alpine
Alpine.start()

