import * as express from 'express';
import * as bodyParser from 'body-parser';

 export const Subscription = express.Router();

    Subscription.post('/', bodyParser.json(), async(req, res) =>{
        console.log(req.body)
        return res.status(201).json({name: 'Aldo Ratmawan'});
    });

