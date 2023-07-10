import * as express from 'express';
import * as http from 'http';
import * as WebSocket from 'ws';
import * as cors from 'cors';
import { Subscription } from '../Routes/subscription';

const app = express();
const server = http.createServer(app);
const wss = new WebSocket.Server({ server });

app.use(cors({origin: 'http://example.com'}));

wss.on('connection', (ws: WebSocket) => {
    ws.on('message', (message: string) => {
        console.log('received: %s', message);
        ws.send(`Hello, you sent -> ${message}`);
    });
    ws.send('Hi there, I am a WebSocket server');
});

wss.on('error', (error) =>{
    console.log(error)
});

wss.addListener('listening', async(ws: WebSocket) =>{
    console.log('listening')
})

app.use('/api', Subscription);

server.listen(process.env.PORT || 8999, () => {
    console.log(`Server started on port 8999 :)`);
});