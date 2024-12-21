import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import './index.css'
import 'bootstrap/dist/css/bootstrap.min.css';
import App from './App';
import Nav from './components/nav/nav';


createRoot(document.getElementById('root')).render(
  <StrictMode>
    <App></App>
  </StrictMode>,
)

createRoot(document.getElementById('nav')).render(
  <StrictMode>
    <Nav></Nav>
  </StrictMode>,
)