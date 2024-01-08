
CREATE Table IF NOT EXISTS User (

    ID_user VARCHAR(255) PRIMARY KEY NOT NULL,
    Username VARCHAR(255),
    Password VARCHAR(255),
    Email  VARCHAR(255) Unique,
    Img_User VARCHAR(255),
    Created_at DATE DEFAULT CURRENT_TIMESTAMP

);
CREATE Table IF NOT EXISTS Role (
    RoleName VARCHAR(255) PRIMARY KEY NOT NULL
);

CREATE Table IF NOT EXISTS RoleOfUser (

    ID_user VARCHAR(255),
    RoleName VARCHAR(255),

    FOREIGN KEY (ID_user) REFERENCES User(ID_user),
    FOREIGN KEY (RoleName) REFERENCES Role(RoleName),
 
    PRIMARY KEY (ID_user , RoleName) 

);

CREATE Table IF NOT EXISTS Categories (

    ID_category VARCHAR(255) PRIMARY KEY NOT NULL,
    Category_Name VARCHAR(255),
    Category_Desc VARCHAR(255),
    Created_at DATE DEFAULT CURRENT_TIMESTAMP,
    Updated_at DATE DEFAULT CURRENT_TIMESTAMP
    
);

CREATE Table IF NOT EXISTS Wikis (

    ID_wiki VARCHAR(255) PRIMARY KEY NOT NULL,
    Wiki_title VARCHAR(255),
    Wiki_content TEXT,
    Wiki_img VARCHAR(255),
    ID_user VARCHAR(255),
    ID_category VARCHAR(255),
    FOREIGN KEY (ID_user) REFERENCES User(ID_user),
    FOREIGN KEY (ID_category) REFERENCES Categories(ID_category),
    Created_at DATE DEFAULT CURRENT_TIMESTAMP

);
CREATE Table IF NOT EXISTS Tags (

    ID_tag VARCHAR(255) PRIMARY KEY NOT NULL,
    Tag_name VARCHAR(255),
    Created_at DATE DEFAULT CURRENT_TIMESTAMP,
    Updated_at DATE DEFAULT CURRENT_TIMESTAMP

);
CREATE Table IF NOT EXISTS WikiTags (

    ID_tag VARCHAR(255),
    ID_wiki VARCHAR(255),
    FOREIGN KEY (ID_tag) REFERENCES Tags(ID_tag),
    FOREIGN KEY (ID_wiki) REFERENCES Wikis(ID_wiki),

    PRIMARY KEY (ID_tag , ID_wiki)

);

