import { Passkeys } from '@laravel/passkeys'

window.FilamentPasskeys = {
    async register(name) {
        if (! name?.trim()) {
            return
        }

        return Passkeys.register({ name })
    },

    async login(redirect) {
        const response = await Passkeys.verify()

        window.location.href = redirect || response?.redirect || '/'
    },
}
