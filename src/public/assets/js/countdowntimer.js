class CountDownTimer {
    constructor({ seconds, listeners, step = 1 }) {
        this.interval = undefined;

        this.millis = Math.floor(seconds * 1000);
        this.step = step;

        this.listeners = listeners;
    }

    start() {
        let lastUpdate = Date.now();
        let millisLeft = this.millis;

        this.interval = setInterval(() => {
            const now = Date.now();
            const dt = now - lastUpdate;

            lastUpdate = now;

            millisLeft -= dt;

            if (millisLeft <= 0) {
                this.stop()

                if (this.listeners.onChange) this.listeners.onChange(0);
            } else {
                if (this.listeners.onChange) this.listeners.onChange(millisLeft);
            }
        }, this.step);
    }

    stop() {
        if (this.interval) {
            window.clearInterval(this.interval);

            this.interval = undefined;
        }

        if (this.listeners.onStop) this.listeners.onStop();
    }
}