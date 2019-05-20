package database;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;

public class Main {
    public static void main(String[] args) throws Exception
    {
        dropRelatedTable();
        dropAppliesTable();
        dropMembersTable();
        dropPublishesTable();
        dropResponsesTable();
        dropRequestsTable();
        dropSalary_reviewTable();
        dropBenefits_reviewTable();
        dropGeneral_reviewTable();
        dropInterview_reviewTable();
        dropAwardTable();
        dropPhotoTable();
        dropProjectTable();
        dropJobTable();
        dropWorksTable();
        dropFollowsTable();
        dropAdminTable();
        dropEmployeeTable();
        dropCompanyTable();
        dropReviewTable();
        dropUserTable();

        createUserTable();
        createEmployeeTable();
        createCompanyTable();
        createAdminTable();
        createReviewTable();
        createFollowsTable();
        createWorksTable();
        createJobTable();
        createProjectTable();
        createPhotoTable();
        createAwardTable();
        createSalary_reviewTable();
        createInterview_reviewTable();
        createBenefits_reviewTable();
        createGeneral_reviewTable();
        createAppliesTable();
        createResponsesTable();
        createPublishesTable();
        createRelatedTable();
        createRequestsTable();
        createMembersTable();
    }



    public static void dropEmployeeTable()
            throws Exception
    {
        try
        {
            Connection con = getConnection();
            PreparedStatement posted = con.prepareStatement("DROP TABLE employee");
            posted.executeUpdate();
        }
        catch (Exception e) {System.out.println(e);}
        finally
        {
            System.out.println("employee table drop complete");
        }
    }

    public static void dropUserTable()
            throws Exception
    {
        try
        {
            Connection con = getConnection();
            PreparedStatement posted = con.prepareStatement("DROP TABLE user");
            posted.executeUpdate();
        }
        catch (Exception e) {System.out.println(e);}
        finally
        {
            System.out.println("user table drop complete");
        }
    }

    public static void dropCompanyTable()
            throws Exception
    {
        try
        {
            Connection con = getConnection();
            PreparedStatement posted = con.prepareStatement("DROP TABLE company");
            posted.executeUpdate();
        }
        catch (Exception e) {System.out.println(e);}
        finally
        {
            System.out.println("company table drop complete");
        }
    }

    public static void dropEmployerTable()
            throws Exception
    {
        try
        {
            Connection con = getConnection();
            PreparedStatement posted = con.prepareStatement("DROP TABLE employer");
            posted.executeUpdate();
        }
        catch (Exception e) {System.out.println(e);}
        finally
        {
            System.out.println("employer table drop complete");
        }
    }

    public static void dropFollowsTable()
            throws Exception
    {
        try
        {
            Connection con = getConnection();
            PreparedStatement posted = con.prepareStatement("DROP TABLE follows");
            posted.executeUpdate();
        }
        catch (Exception e) {System.out.println(e);}
        finally
        {
            System.out.println("follows table drop complete");
        }
    }

    public static void dropWorksTable()
            throws Exception
    {
        try
        {
            Connection con = getConnection();
            PreparedStatement posted = con.prepareStatement("DROP TABLE works");
            posted.executeUpdate();
        }
        catch (Exception e) {System.out.println(e);}
        finally
        {
            System.out.println("works table drop complete");
        }
    }
    public static void dropJobTable()
            throws Exception
    {
        try
        {
            Connection con = getConnection();
            PreparedStatement posted = con.prepareStatement("DROP TABLE job");
            posted.executeUpdate();
        }
        catch (Exception e) {System.out.println(e);}
        finally
        {
            System.out.println("job table drop complete");
        }
    }
    public static void dropProjectTable()
            throws Exception
    {
        try
        {
            Connection con = getConnection();
            PreparedStatement posted = con.prepareStatement("DROP TABLE project");
            posted.executeUpdate();
        }
        catch (Exception e) {System.out.println(e);}
        finally
        {
            System.out.println("project table drop complete");
        }
    }

    public static void dropPhotoTable()
            throws Exception
    {
        try
        {
            Connection con = getConnection();
            PreparedStatement posted = con.prepareStatement("DROP TABLE photo");
            posted.executeUpdate();
        }
        catch (Exception e) {System.out.println(e);}
        finally
        {
            System.out.println("photo table drop complete");
        }
    }

    public static void dropAwardTable()
            throws Exception
    {
        try
        {
            Connection con = getConnection();
            PreparedStatement posted = con.prepareStatement("DROP TABLE award");
            posted.executeUpdate();
        }
        catch (Exception e) {System.out.println(e);}
        finally
        {
            System.out.println("award table drop complete");
        }
    }

    public static void dropAppliesTable()
            throws Exception
    {
        try
        {
            Connection con = getConnection();
            PreparedStatement posted = con.prepareStatement("DROP TABLE applies");
            posted.executeUpdate();
        }
        catch (Exception e) {System.out.println(e);}
        finally
        {
            System.out.println("applies table drop complete");
        }
    }

    public static void dropReviewTable()
            throws Exception
    {
        try
        {
            Connection con = getConnection();
            PreparedStatement posted = con.prepareStatement("DROP TABLE review");
            posted.executeUpdate();
        }
        catch (Exception e) {System.out.println(e);}
        finally
        {
            System.out.println("review table drop complete");
        }
    }

    public static void dropResponsesTable()
            throws Exception
    {
        try
        {
            Connection con = getConnection();
            PreparedStatement posted = con.prepareStatement("DROP TABLE responses");
            posted.executeUpdate();
        }
        catch (Exception e) {System.out.println(e);}
        finally
        {
            System.out.println("responses table drop complete");
        }
    }

    public static void dropPublishesTable()
            throws Exception
    {
        try
        {
            Connection con = getConnection();
            PreparedStatement posted = con.prepareStatement("DROP TABLE publishes");
            posted.executeUpdate();
        }
        catch (Exception e) {System.out.println(e);}
        finally
        {
            System.out.println("publishes table drop complete");
        }
    }

    public static void dropRelatedTable()
            throws Exception
    {
        try
        {
            Connection con = getConnection();
            PreparedStatement posted = con.prepareStatement("DROP TABLE related");
            posted.executeUpdate();
        }
        catch (Exception e) {System.out.println(e);}
        finally
        {
            System.out.println("related table drop complete");
        }
    }

    public static void dropAdminTable()
            throws Exception
    {
        try
        {
            Connection con = getConnection();
            PreparedStatement posted = con.prepareStatement("DROP TABLE admin");
            posted.executeUpdate();
        }
        catch (Exception e) {System.out.println(e);}
        finally
        {
            System.out.println("admin table drop complete");
        }
    }

    public static void dropSalary_reviewTable()
            throws Exception
    {
        try
        {
            Connection con = getConnection();
            PreparedStatement posted = con.prepareStatement("DROP TABLE salary_review");
            posted.executeUpdate();
        }
        catch (Exception e) {System.out.println(e);}
        finally
        {
            System.out.println("salary_review table drop complete");
        }
    }
    public static void dropBenefits_reviewTable()
            throws Exception
    {
        try
        {
            Connection con = getConnection();
            PreparedStatement posted = con.prepareStatement("DROP TABLE benefits_review");
            posted.executeUpdate();
        }
        catch (Exception e) {System.out.println(e);}
        finally
        {
            System.out.println("benefits_review table drop complete");
        }
    }

    public static void dropGeneral_reviewTable()
            throws Exception
    {
        try
        {
            Connection con = getConnection();
            PreparedStatement posted = con.prepareStatement("DROP TABLE general_review");
            posted.executeUpdate();
        }
        catch (Exception e) {System.out.println(e);}
        finally
        {
            System.out.println("general_review table drop complete");
        }
    }

    public static void dropInterview_reviewTable()
            throws Exception
    {
        try
        {
            Connection con = getConnection();
            PreparedStatement posted = con.prepareStatement("DROP TABLE interview_review");
            posted.executeUpdate();
        }
        catch (Exception e) {System.out.println(e);}
        finally
        {
            System.out.println("interview_review table drop complete");
        }
    }

    public static void dropRequestsTable()
            throws Exception
    {
        try
        {
            Connection con = getConnection();
            PreparedStatement posted = con.prepareStatement("DROP TABLE requests");
            posted.executeUpdate();
        }
        catch (Exception e) {System.out.println(e);}
        finally
        {
            System.out.println("requests table drop complete");
        }
    }

    public static void dropMembersTable()
            throws Exception
    {
        try
        {
            Connection con = getConnection();
            PreparedStatement posted = con.prepareStatement("DROP TABLE members");
            posted.executeUpdate();
        }
        catch (Exception e) {System.out.println(e);}
        finally
        {
            System.out.println("members table drop complete");
        }
    }

    public static void createUserTable()
    {
        try
        {
            Connection connection = getConnection();
            PreparedStatement ownst = connection.prepareStatement("CREATE TABLE user( "
                    + "userID		varchar(20) PRIMARY KEY,"
                    + "mail		varchar(40) NOT NULL,"
                    + "password	varchar(20) NOT NULL,"
                    + "phone_number1	varchar(20),"
                    + "phone_number2	varchar(20),"
                    + "profile_picture	varchar(200) )"
                    + "Engine=InnoDB");
            ownst.executeUpdate();
        }
        catch (Exception e) {System.out.print(e);}
        finally{System.out.println("user table created");}
    }

    public static void createEmployeeTable()
    {
        try
        {
            Connection connection = getConnection();
            PreparedStatement ownsT = connection.prepareStatement("CREATE TABLE employee("
                    + "employeeID		varchar(20) PRIMARY KEY,"
                    + "first_name		varchar(40) NOT NULL,"
                    + "middle_name		varchar(40),"
                    + "last_name		varchar(40) NOT NULL,"
                    + "gender		    varchar(20),"
                    + "highest_education	varchar(40),"
                    + "resume		varchar(40),"
                    + "position		varchar(40),"
                    + "Location		varchar(40),"
                    + "FOREIGN KEY(employeeID) REFERENCES user(userID) ON UPDATE CASCADE ON DELETE CASCADE)"
                    + "Engine=InnoDB");
            ownsT.executeUpdate();
        }
        catch (Exception e) {System.out.print(e);}
        finally{System.out.println("employee table created");}
    }
    public static void createCompanyTable()
    {
        try
        {
            Connection connection = getConnection();
            PreparedStatement ownsT = connection.prepareStatement("CREATE TABLE company("
                    + "companyID	varchar(20) PRIMARY KEY,"
                    + "name		varchar(20) NOT NULL,"
                    + "website	varchar(50),"
                    + "industry	varchar(10) NOT NULL,"
                    + "sector		varchar(10) NOT NULL,"
                    + "revenue	double,"
                    + "establish_date	date,"
                    + "type		varchar(10) NOT NULL,"
                    + "headquarter	varchar(10) NOT NULL,"
                    + "FOREIGN KEY(companyID) REFERENCES user(userID) ON UPDATE CASCADE ON DELETE CASCADE)"
                    + "Engine=InnoDB");
            ownsT.executeUpdate();
        }
        catch (Exception e) {System.out.print(e);}
        finally{System.out.println("company table created");}
    }
    public static void createFollowsTable()
    {
        try
        {
            Connection connection = getConnection();
            PreparedStatement ownsT = connection.prepareStatement("CREATE TABLE follows("
                    + "employeeID		varchar(20),"
                    + "companyID		varchar(20),"
                    + "PRIMARY KEY(employeeID, companyID),"
                    + "FOREIGN KEY(employeeID) REFERENCES employee(employeeID) ON UPDATE CASCADE ON DELETE CASCADE,"
                    + "FOREIGN KEY(companyID) REFERENCES company(companyID) ON UPDATE CASCADE ON DELETE CASCADE)"
                    + "Engine=InnoDB");
            ownsT.executeUpdate();
        }
        catch (Exception e) {System.out.print(e);}
        finally{System.out.println("follows table created");}
    }


    public static void createWorksTable()
    {
        try
        {
            Connection connection = getConnection();
            PreparedStatement ownsT = connection.prepareStatement("CREATE TABLE works("
                    + "employeeID		varchar(20),"
                    + "companyID		varchar(20),"
                    + "PRIMARY KEY(employeeID, companyID),"
                    + "FOREIGN KEY(employeeID) REFERENCES employee(employeeID) ON UPDATE CASCADE ON DELETE CASCADE,"
                    + "FOREIGN KEY(companyID) REFERENCES company(companyID) ON UPDATE CASCADE ON DELETE CASCADE)"
                    + "Engine=InnoDB");
            ownsT.executeUpdate();
        }
        catch (Exception e) {System.out.print(e);}
        finally{System.out.println("works table created");}
    }

    public static void createJobTable()
    {
        try
        {
            Connection connection = getConnection();
            PreparedStatement ownsT = connection.prepareStatement("CREATE TABLE job("
                    + "companyID		varchar(20),"
                    + "title			varchar(40),"
                    + "salary			double,"
                    + "post_date		date,"
                    + "jobID			varchar(20),"
                    + "education		varchar(40),"
                    + "position		    varchar(20) NOT NULL,"
                    + "experience		varchar(40),"
                    + "benefits		    varchar(40),"
                    + "type			    varchar(40) NOT NULL,"
                    + "PRIMARY KEY(companyID, title,salary,post_date),"
                    + "FOREIGN KEY(companyID) REFERENCES company(companyID) ON UPDATE CASCADE ON DELETE CASCADE  )"
                    + "Engine=InnoDB");
            ownsT.executeUpdate();
        }
        catch (Exception e) {System.out.print(e);}
        finally{System.out.println("job table created");}
    }

    public static void createProjectTable()
    {
        try
        {
            Connection connection = getConnection();
            PreparedStatement ownsT = connection.prepareStatement("CREATE TABLE project("
                    + "companyID		varchar(20),"
                    + "projectID		varchar(20),"
                    + "title			varchar(20),"
                    + "start_date		date,"
                    + "status			varchar(40),"
                    + "description		varchar(40),"
                    + "PRIMARY KEY(companyID ,title,start_date),"
                    + "FOREIGN KEY(companyID) REFERENCES company(companyID) ON UPDATE CASCADE ON DELETE CASCADE )"
                    + "Engine=InnoDB");
            ownsT.executeUpdate();
        }
        catch (Exception e) {System.out.print(e);}
        finally{System.out.println("project table created");}
    }


    public static void createPhotoTable()
    {
        try
        {
            Connection connection = getConnection();
            PreparedStatement ownsT = connection.prepareStatement("create table photo("
                    + "companyID	varchar(20),"
                    + "photo_name	varchar(20),"
                    + "photo_url	varchar(200),"
                    + "PRIMARY KEY(companyID, photo_name, photo_url),"
                    + "FOREIGN KEY(companyID) REFERENCES company(companyID) ON UPDATE CASCADE ON DELETE CASCADE)"
                    + "Engine=InnoDB");
            ownsT.executeUpdate();
        }
        catch (Exception e) {System.out.print(e);}
        finally{System.out.println("photo table created");}
    }

    public static void createAwardTable()
    {
        try
        {
            Connection connection = getConnection();
            PreparedStatement ownsT = connection.prepareStatement("CREATE TABLE award("
                    + "companyID		varchar(20),"
                    + "award_name		varchar(20),"
                    + "committee_name	varchar(20),"
                    + "PRIMARY KEY(companyID, award_name, committee_name),"
                    + "FOREIGN KEY(companyID) REFERENCES company(companyID) ON UPDATE CASCADE ON DELETE CASCADE)"
                    + "Engine=InnoDB");
            ownsT.executeUpdate();
        }
        catch (Exception e) {System.out.print(e);}
        finally{System.out.println("award table created");}
    }

    public static void createAppliesTable()
    {
        try
        {
            Connection connection = getConnection();
            PreparedStatement ownsT = connection.prepareStatement("CREATE TABLE applies("
                    + "employeeID     varchar(20),"
                    + "companyID    	varchar(20),"
                    + "title 		varchar(40),"
                    + "salary		double,"
                    + "post_date	date,"
                    + "PRIMARY KEY ( employeeID, companyID, title, salary, post_date ),"
                    + "FOREIGN KEY ( employeeID) REFERENCES employee(employeeID) ON UPDATE CASCADE ON DELETE CASCADE,"
                    + "FOREIGN KEY ( companyID, title, salary,post_date ) references job(companyID, title, salary, post_date) ON UPDATE CASCADE ON DELETE CASCADE)"
                    + "Engine=InnoDB");
            ownsT.executeUpdate();
        }
        catch (Exception e) {System.out.print(e);}
        finally{System.out.println("applies table created");}
    }

    public static void createReviewTable()
    {
        try
        {
            Connection connection = getConnection();
            PreparedStatement ownsT = connection.prepareStatement("CREATE TABLE review("
                    + "reviewID		        int PRIMARY KEY,"
                    + "Employment_status	bit NOT NULL,"
                    + "job_title		    varchar(40) NOT NULL,"
                    + "publish_date		    date NOT NULL,"
                    + "rating			    double NOT NULL,"
                    + "location		        varchar(40) NOT NULL,"
                    + "comment		        varchar(500) NOT NULL,"
                    + "visibility		    bit NOT NULL )"
                    + "Engine=InnoDB");
            ownsT.executeUpdate();
        }
        catch (Exception e) {System.out.print(e);}
        finally{System.out.println("review table created");}
    }

    public static void createResponsesTable()
    {
        try
        {
            Connection connection = getConnection();
            PreparedStatement ownsT = connection.prepareStatement("CREATE TABLE responses("
                    + "respond	varchar(200),"
                    + "reviewID          	int,"
                    + "employeeID     	varchar(20),"
                    + "PRIMARY KEY (reviewID, respond),"
                    + "FOREIGN KEY (reviewID) references review(reviewID) ON UPDATE CASCADE ON DELETE CASCADE,"
                    + "FOREIGN KEY (employeeID) references employee(employeeID) ON UPDATE CASCADE ON DELETE CASCADE)"
                    + "Engine=InnoDB");
            ownsT.executeUpdate();
        }
        catch (Exception e) {System.out.print(e);}
        finally{System.out.println("responses table created");}
    }

    public static void createPublishesTable()
    {
        try
        {
            Connection connection = getConnection();
            PreparedStatement ownsT = connection.prepareStatement("CREATE TABLE publishes("
                    + "reviewID          	           	int,"
                    + "employeeID    	           	varchar(20),"
                    + "PRIMARY KEY (reviewID),"
                    + "FOREIGN KEY (reviewID) references review(reviewID) ON UPDATE CASCADE ON DELETE CASCADE,"
                    + "FOREIGN KEY (employeeID) references employee(employeeID) ON UPDATE CASCADE ON DELETE CASCADE)"
                    + "Engine=InnoDB");
            ownsT.executeUpdate();
        }
        catch (Exception e) {System.out.print(e);}
        finally{System.out.println("publishes table created");}
    }

    public static void createRelatedTable()
    {
        try
        {
            Connection connection = getConnection();
            PreparedStatement ownsT = connection.prepareStatement("CREATE TABLE related("
                    + "reviewID          	           	int,"
                    + "companyID     	           	varchar(20),"
                    + "PRIMARY KEY ( reviewID),"
                    + "FOREIGN KEY ( reviewID) references review(reviewID) ON UPDATE CASCADE ON DELETE CASCADE,"
                    + "FOREIGN KEY ( companyID) references company(companyID) ON UPDATE CASCADE ON DELETE CASCADE)"
                    + "Engine=InnoDB");
            ownsT.executeUpdate();
        }
        catch (Exception e) {System.out.print(e);}
        finally{System.out.println("related table created");}
    }

    public static void createAdminTable()
    {
        try
        {
            Connection connection = getConnection();
            PreparedStatement ownsT = connection.prepareStatement("CREATE TABLE admin("
                    + "adminID          	varchar(20) PRIMARY KEY,"
                    + "FOREIGN KEY(adminID) REFERENCES user(userID) ON UPDATE CASCADE ON DELETE CASCADE)"
                    + "Engine=InnoDB");
            ownsT.executeUpdate();
        }
        catch (Exception e) {System.out.print(e);}
        finally{System.out.println("admin table created");}
    }

    public static void createSalary_reviewTable()
    {
        try
        {
            Connection connection = getConnection();
            PreparedStatement ownsT = connection.prepareStatement("CREATE TABLE salary_review("
                    + "reviewID          	           int PRIMARY KEY,"
                    + "salary                              double NOT NULL,"
                    + "FOREIGN KEY(reviewID) REFERENCES review(reviewID) ON UPDATE CASCADE ON DELETE CASCADE)"
                    + "Engine=InnoDB");
            ownsT.executeUpdate();
        }
        catch (Exception e) {System.out.print(e);}
        finally{System.out.println("salary_review table created");}
    }

    public static void createBenefits_reviewTable()
    {
        try
        {
            Connection connection = getConnection();
            PreparedStatement ownsT = connection.prepareStatement("CREATE TABLE benefits_review("
                    + "reviewID          	           int PRIMARY KEY,"
                    + "opportunities  	           varchar(100) NOT NULL,"
                    + "FOREIGN KEY(reviewID) REFERENCES review(reviewID) ON UPDATE CASCADE ON DELETE CASCADE)"
                    + "Engine=InnoDB");
            ownsT.executeUpdate();
        }
        catch (Exception e) {System.out.print(e);}
        finally{System.out.println("benefits_review table created");}
    }

    public static void createGeneral_reviewTable()
    {
        try
        {
            Connection connection = getConnection();
            PreparedStatement ownsT = connection.prepareStatement("CREATE TABLE general_review("
                    + "reviewID           int PRIMARY KEY,"
                    + "pros   	        varchar(100) NOT NULL,"
                    + "cons               varchar(100) NOT NULL,"
                    + "advice_to_management         varchar(200),"
                    + "FOREIGN KEY(reviewID) REFERENCES review(reviewID) ON UPDATE CASCADE ON DELETE CASCADE)"
                    + "Engine=InnoDB");
            ownsT.executeUpdate();
        }
        catch (Exception e) {System.out.print(e);}
        finally{System.out.println("general_review table created");}
    }

    public static void createInterview_reviewTable()
    {
        try
        {
            Connection connection = getConnection();
            PreparedStatement ownsT = connection.prepareStatement("CREATE TABLE interview_review("
                    + "reviewID       int PRIMARY KEY,"
                    + "experiences    varchar(200) NOT NULL,"
                    + "reach          varchar(20) NOT NULL,"
                    + "difficulty     int NOT NULL,"
                    + "offer_status   bit NOT NULL,"
                    + "length         int NOT NULL,"
                    + "Questions		varchar(200) NOT NULL,"
                    + "FOREIGN KEY(reviewID) REFERENCES review(reviewID) ON UPDATE CASCADE ON DELETE CASCADE)"
                    + "Engine=InnoDB");
            ownsT.executeUpdate();
        }
        catch (Exception e) {System.out.print(e);}
        finally{System.out.println("interview_review table created");}
    }

    public static void createRequestsTable()
    {
        try
        {
            Connection connection = getConnection();
            PreparedStatement ownsT = connection.prepareStatement("CREATE TABLE requests ("
                    + "reviewID         int,"
                    + "companyID        varchar(20),"
                    + "adminID          varchar(20),"
                    + "PRIMARY KEY (reviewID),"
                    + "FOREIGN KEY (reviewID) references review(reviewID) ON UPDATE CASCADE ON DELETE CASCADE,"
                    + "FOREIGN KEY (companyID) references company(companyID) ON UPDATE CASCADE ON DELETE CASCADE,"
                    + "FOREIGN KEY (adminID) references admin(adminID) ON UPDATE CASCADE ON DELETE CASCADE)"
                    + "Engine=InnoDB");
            ownsT.executeUpdate();
        }
        catch (Exception e) {System.out.print(e);}
        finally{System.out.println("requests table created");}
    }

    public static void createMembersTable()
    {
        try
        {
            Connection connection = getConnection();
            PreparedStatement ownsT = connection.prepareStatement("CREATE TABLE members ("
                    + "employeeID       varchar(20),"
                    + "companyID        varchar(20),"
                    + "title            varchar(40),"
                    + "start_date       date,"
                    + "PRIMARY KEY ( employeeID, companyID, title, start_date),"
                    + "FOREIGN KEY ( employeeID ) references employee(employeeID) ON UPDATE CASCADE ON DELETE CASCADE,"
                    + "FOREIGN KEY ( companyID, title, start_date ) references project(companyID, title, start_date) ON UPDATE CASCADE ON DELETE CASCADE)"
                    + "Engine=InnoDB");
            ownsT.executeUpdate();
        }
        catch (Exception e) {System.out.print(e);}
        finally{System.out.println("members table created");}
    }





    public static Connection getConnection() throws Exception
    {
        try
        {
            String driver = "com.mysql.jdbc.Driver";
            String url = "jdbc:mysql://dijkstra.ug.bcc.bilkent.edu.tr/ege_marasli";
            String username = "ege.marasli";
            String password = "8nhmQrdt";

            Class.forName(driver);
            Connection con = DriverManager.getConnection(url, username, password);
            System.out.println("Connected");

            return con;

        }catch(Exception e) {System.out.print(e);}

        return null;
    }

}
