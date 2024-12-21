import './nav.css'

function Nav() {
    return (
      <>
      <div className="chatIcons row">
                <div className="col">
                    <img src="../Images/aurelia.jpg" id="Aurelia" onclick="changeChat(this.id)"></img>
                </div>
            </div> 
            <div className="chatIcons row">
                <div className="col">
                    <img src="../Images/michael.jpg" id="Michael" onclick="changeChat(this.id)"></img>
                </div>
            </div> 
            <div className="chatIcons row">
                <div className="col">
                    <img src="../Images/boo.jpg" id="Boo" onclick="changeChat(this.id)"></img>
                </div>
            </div> 
            <div className="navitem row mt-auto">
                <div className="col-12">
                    <i className="fa-solid fa-gear fa-fw"></i>
                </div>
            </div>
      </>
    )
  }
  
  export default Nav
  