using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Hotel
{
    #region Comment
    public class Comment
    {
        #region Member Variables
        protected string _comment;
        #endregion
        #region Constructors
        public Comment() { }
        public Comment(string comment)
        {
            this._comment=comment;
        }
        #endregion
        #region Public Properties
        public virtual string Comment
        {
            get {return _comment;}
            set {_comment=value;}
        }
        #endregion
    }
    #endregion
}