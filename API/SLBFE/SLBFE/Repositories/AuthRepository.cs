using Microsoft.EntityFrameworkCore;
using SLBFE.Contexts;
using SLBFE.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace SLBFE.Repositories
{
    public class AuthRepository : IAuthRepository
    {

        protected ModelsDbContext _context;

        public AuthRepository(ModelsDbContext context)
        {
            _context = context;
        }

        public Citizen CitizenLogin(Citizen citizen)
        {
            return _context.Citizen.AsNoTracking().FirstOrDefault(c => c.Email == citizen.Email && c.Password == citizen.Password);
        }

        public Officer OfficerLogin(Officer officer)
        {
            return _context.Officer.AsNoTracking().FirstOrDefault(c => c.Email == officer.Email && c.Password == officer.Password);
        }

        public Company CompanyLogin(Company company)
        {
            return _context.Company.AsNoTracking().FirstOrDefault(c => c.Email == company.Email && c.Password == company.Password);
        }
    }
}
