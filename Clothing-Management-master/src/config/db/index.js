const mongoose = require('mongoose');

async function connect() {
    try {
        await mongoose.connect('mongodb://mongo-db:27017/f8_education_dev', {
            useNewUrlParser: true,
            useUnifiedTopology: true,
            useCreateIndex: true,
        });
        console.log('Connect successfully!!!');
    } catch (error) {
        console.log('Connect failure!!!');
    }
}

module.exports = { connect };
