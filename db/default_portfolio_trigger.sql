drop trigger if exists default_portfolio;

create trigger default_portfolio 
after insert on users
for each row
    insert into portfolios 
      values (new.id, new.username, 100000, false);
    
