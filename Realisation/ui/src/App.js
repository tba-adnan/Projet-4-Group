
import './App.css';
import Header from './components/Header';
import Dashboard from './Dashboard';
import Footer from './Footer';
import Menu from './Menu';
import Navbar from './Navbar';

function App() {
  return (
    <div className="wrapper">
      <Header />
      <Navbar />
      <Menu />
      <Dashboard />
      <Footer />
    </div>
  );
}

export default App;
